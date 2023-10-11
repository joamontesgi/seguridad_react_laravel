import React from 'react';
import { useNavigate } from 'react-router-dom';
import axios from 'axios';

const Home = () => {
    const navigate = useNavigate();

    const handleLogout = async () => {
        try {
            const accessToken = localStorage.getItem('access_token');

            if (!accessToken) {
                console.error('Token de acceso no encontrado');
                return;
            }
            const headers = {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${accessToken}`,
            };

            const response = await axios.post('http://localhost:8000/api/logout', {}, { headers });

            if (response.status === 200) {
                localStorage.removeItem('access_token');

                navigate('/login');
            } else {
                console.error('Error al cerrar sesión');
            }
        } catch (error) {
            console.error('Error en la solicitud de cierre de sesión:', error);
        }
    };

    return (
        <div>
            <h1>Home</h1>
            <button onClick={handleLogout}>
                Cerrar sesión
            </button>
        </div>
    );
};

export default Home;
