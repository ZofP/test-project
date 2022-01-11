export type User = {
    name: string;
    email: string;
};

export type Article = {
    id: number;
    title: string;
    text: string;
    date: string;
    user_id: number;
    user: User;
};
