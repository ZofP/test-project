import React from "react";
import ArticlesList from "../../components/ArticlesList/ArticlesList";
import Article from "../../components/Article/Article";

import "./ArticlesIndex.scss";

const ArticlesIndex = () => {
    return (
        <div className="articles__index">
            <h2>Articles</h2>
            <Article type="new" />
            <ArticlesList />
        </div>
    );
};

export default ArticlesIndex;
