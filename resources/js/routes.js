import AllUsers from "./components/AllUsers";
import EditUser from "./components/EditUser";

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllUsers
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditUser
    }
];
