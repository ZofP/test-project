import React, { useContext, useEffect } from 'react';
import ArticleRow from '../ArticleRow/ArticleRow';
import Filters from '../Filters/Filters';
import { RotateSpinner } from 'react-spinners-kit';

import './ArticlesList.scss'
import Context from '../App/Context';


const ArticlesList = () => {

    const { loading, fetchArticlesData, filteredArticles } = useContext(Context);

    useEffect(() => {
        fetchArticlesData();
    }, []);


    return (

        <div className="article__list">
            <div className="article__list__headers article__list__row">
                <div>
                    <p>Author</p>
                </div>
                <div>
                    <p>Article Title</p>
                </div>
                <div>
                    <p>Date Modified</p>
                </div>
                <div>
                    <p>Actions</p>
                </div>
            </div>

            <Filters />
            {
                loading ?
                    <div className="article__loading">
                        <RotateSpinner color="#ea2b1f" />
                    </div>
                    :
                    !filteredArticles.length ?
                        <div className="article__list__errors">
                            No results found
                        </div>
                        :
                        filteredArticles.map(article =>
                            <ArticleRow key={article.id} article={article} />
                        )
            }
        </div>

    )
}

export default ArticlesList
