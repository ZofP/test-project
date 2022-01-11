import React from "react";
import { Link } from "react-router-dom";
import "./ArticleRow.scss";

import { Article } from "../App/Types";

type TProps = {
    article: Article;
};

const ArticleRow = ({ article }: TProps) => {
    return (
        <div className="article__list__row article__list__item">
            <div>
                <p>{article.user.name}</p>
            </div>
            <div>
                <p>{article.title}</p>
            </div>
            <div>
                <p>{article.date}</p>
            </div>
            <div className="article__actions">
                <Link to={`/${article.id}`}>Detail</Link>
            </div>
        </div>
    );
};

export default ArticleRow;
