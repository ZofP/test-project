import axios from 'axios';
import React, { useEffect, useState } from 'react'
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import ArticlesIndex from '../../pages/ArticlesIndex/ArticlesIndex';
import ArticlesShow from '../../pages/ArticlesShow/ArticlesShow';
import Context from './Context'

const App = () => {

    const [userId, setUserId] = useState(0);

    const [loading, setLoading] = useState(false);

    const [articles, setArticles] = useState([]);

    const [filteredArticles, setFilteredArticles] = useState([]);

    const fetchUserId = async () => {

        const response = await axios.get('/api/user');

        const userId = response.data.user_id;

        setUserId(userId);
    }

    const fetchArticlesData = async () => {
        setLoading(true)
        const response = await axios.get('/api/articles');

        const articlesData = response.data.articles;

        setArticles(articlesData);
        setFilteredArticles(articlesData);
        setLoading(false)
    }

    useEffect(() => {
        fetchUserId();
    }, [])


    const context = {
        userId: userId,
        fetchArticlesData: fetchArticlesData,
        articles: articles,
        setArticles: setArticles,
        filteredArticles: filteredArticles,
        setFilteredArticles: setFilteredArticles,
        loading: loading
    }


    return (
        <Context.Provider value={context}>
            <Router basename='/articles'>
                <Routes>
                    <Route path='/:id' element={<ArticlesShow />} />
                    <Route exact path='/' element={<ArticlesIndex />} />
                </Routes>
            </Router>
        </Context.Provider>
    )
}

export default App
