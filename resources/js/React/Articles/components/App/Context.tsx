import { createContext } from "react";
import { Article } from "./Types";

export type TContext = {
    userId: number;
    fetchArticlesData: () => Promise<void>;
    articles: Article[];
    setArticles: React.Dispatch<React.SetStateAction<Article[]>>;
    filteredArticles: Article[];
    setFilteredArticles: React.Dispatch<React.SetStateAction<Article[]>>;
    loading: boolean;
};

const Context = createContext<TContext>({} as TContext);

export default Context;
