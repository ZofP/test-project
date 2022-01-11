import React, { useContext, useEffect, useState } from "react";
import Context from "../App/Context";
import "./Filters.scss";

const Filters = () => {
    const [authorFilter, setAuthorFilter] = useState("");
    const [dateFilter, setDateFilter] = useState("");

    const { setFilteredArticles, articles } = useContext(Context);

    const updateArticlesList = () => {
        const newFilteredArticles = articles.filter(
            (article) =>
                article.user.name
                    .toLowerCase()
                    .includes(authorFilter.toLowerCase()) &&
                article.date.toLowerCase().includes(dateFilter.toLowerCase())
        );

        setFilteredArticles(newFilteredArticles);
    };

    useEffect(() => {
        updateArticlesList();
    }, [authorFilter, dateFilter, articles]);

    return (
        <div className="article__list__row">
            <div>
                <input
                    className="article__filter"
                    type="text"
                    name="author-filter"
                    value={authorFilter}
                    onChange={(e) => setAuthorFilter(e.target.value)}
                    placeholder="type to filter by author ..."
                />
            </div>
            <div />
            <div>
                <input
                    className="article__filter"
                    type="text"
                    name="date-filter"
                    value={dateFilter}
                    onChange={(e) => setDateFilter(e.target.value)}
                    placeholder="type to filter by date ..."
                />
            </div>
            <div />
        </div>
    );
};

export default Filters;
