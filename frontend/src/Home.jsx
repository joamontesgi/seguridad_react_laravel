import React from 'react';
import { useNavigate } from 'react-router-dom';

const Home = () => {
    const navigate = useNavigate();
    const handleLogout = () => {
        localStorage.removeItem('access_token');
        navigate('/login');
    };
    return (
        <div>
            <h1>Inicio</h1>
            <button onClick={handleLogout}>
                Cerrar sesión
            </button>
        </div>
    );
};

export default Home;
