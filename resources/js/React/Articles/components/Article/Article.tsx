import axios from "axios";
import React, { useContext, useState } from "react";
import Context from "../App/Context";
import BackIcon from "@mui/icons-material/ArrowBack";
import "./Article.scss";
import { useNavigate } from "react-router-dom";
import { Article } from "../App/Types";

type ErrorObject = {
    [key: string]: any[];
};

interface Data {
    title: string;
    text: string;
}

interface UpdateData extends Data {
    article_id: number;
}

type TProps = {
    type: "new" | "edit";
    article?: Article;
};

const Article = ({ type, article }: TProps) => {
    const [editing, setEditing] = useState(false);

    const [title, setTitle] = useState(article ? article.title : "");
    const [text, setText] = useState(article ? article.text : "");

    const [errors, setErrors] = useState<string[]>([]);

    const { fetchArticlesData, userId } = useContext(Context);

    const navigate = useNavigate();

    const getErrorsArray = (errorsObject: ErrorObject): string[] => {
        const errorsArray = Object.values(errorsObject).map((arr) => arr[0]);
        return errorsArray;
    };

    const store = async () => {
        const data: Data = {
            title: title,
            text: text,
        };

        try {
            await axios.post(`/article/store`, data);

            setErrors([]);
            setTitle("");
            setText("");

            fetchArticlesData();
        } catch (error: any) {
            const errorsObject: ErrorObject = error.response.data.errors;

            const errorsArray = getErrorsArray(errorsObject);

            setErrors(errorsArray);

            return;
        }
    };

    const update = async () => {
        if (editing && article) {
            const data: UpdateData = {
                article_id: article.id,
                title: title,
                text: text,
            };

            try {
                await axios.post(`/article/update`, data);
                setErrors([]);
            } catch (error: any) {
                const errorsObject: ErrorObject = error.response.data.errors;
                const errorsArray = getErrorsArray(errorsObject);

                setErrors(errorsArray);

                return;
            }
        }

        setEditing(!editing);
    };

    const handleClick = () => {
        if (type === "new") {
            store();
        } else if (type === "edit") {
            update();
        }
    };

    return (
        <div className="article">
            <div className="article__navigation">
                {type === "edit" && (
                    <>
                        <div className="article__back-button">
                            <BackIcon onClick={() => navigate("/")} />
                        </div>
                        <p>Back</p>
                    </>
                )}
            </div>
            <h3>
                {type === "new"
                    ? "Add New Article"
                    : editing
                    ? "Editing Article"
                    : ""}
            </h3>
            <div className="article__errors">
                {errors.map((error, i) => (
                    <p key={i}>{error}</p>
                ))}
            </div>
            <div className="article__form">
                <div className="article__property">
                    <label htmlFor="title">Article Title</label>
                    <input
                        className="article__input"
                        type="text"
                        name="title"
                        id="title"
                        disabled={type === "edit" && !editing}
                        onChange={(e) => setTitle(e.target.value)}
                        value={title}
                    />
                </div>
                <div className="article__property">
                    <label htmlFor="text">Text</label>
                    <textarea
                        className="article__input"
                        name="text"
                        id="text"
                        disabled={type === "edit" && !editing}
                        onChange={(e) => setText(e.target.value)}
                        value={text}
                        placeholder="Enter your article text ..."
                    />
                </div>
            </div>
            <div className="article__save">
                {((article && article.user_id === userId) ||
                    type === "new") && (
                    <button disabled={!text || !title} onClick={handleClick}>
                        {!text || !title
                            ? "Fill all fields"
                            : editing
                            ? "Save Changes"
                            : type === "edit"
                            ? "Edit Article"
                            : "Add Article"}
                    </button>
                )}
            </div>
        </div>
    );
};

export default Article;
