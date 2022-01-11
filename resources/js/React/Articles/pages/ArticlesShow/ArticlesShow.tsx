import axios from 'axios';
import React, { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import Article from '../../components/Article/Article';
import './ArticlesShow.scss'


const ArticlesShow = () => {

    const params = useParams();

    const navigate = useNavigate();

    const articleId = Number(params.id);

    const [article, setArticle] = useState(null);

    const fetchArticleDetail = async () => {

        try {
            const response = await axios.get(`/api/articles/${articleId}`);
            setArticle(response.data.article);
        }

        catch (err) {
            navigate('/')
        }

    }

    useEffect(() => {
        fetchArticleDetail();
    }, [articleId])

    if (!article) {
        return null
    }

    return (
        <div className='articles__show'>
            <h2>Article Detail</h2>
            <Article type='edit' article={article} />
        </div>
    )
}

export default ArticlesShow
