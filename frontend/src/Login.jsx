import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import axios from 'axios';

export default function Login() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const navigate = useNavigate();

  const handleEmailChange = (event) => {
    setEmail(event.target.value);
  };

  const handlePasswordChange = (event) => {
    setPassword(event.target.value);
  };

  const handleLogin = async () => {
    try {
      const response = await axios.post('http://localhost:8000/api/login', {
        email,
        password,
      });

      if (response.status === 200) {
        console.log('Respuesta de inicio de sesión:', response.data);
        // Guardar el token en el almacenamiento local
        localStorage.setItem('access_token', response.data.access_token);

        // Redirigir al usuario a la página deseada
        setTimeout(() => {
          navigate('/home');
        }, 1000);
      } else {
        console.log('Respuesta de inicio de sesión:', response.data);
      }
    } catch (error) {
      // Handle any errors that may occur during the request
      console.error('Error:', error);
      alert('Error al iniciar sesión');
    }
  };

  return (
    <div className="container mt-5 w-25">
      <label htmlFor="email">Correo electrónico: </label>
      <input value={email} type="email" className="form-control" id="email" onChange={handleEmailChange} />
      <label htmlFor="password">Contraseña: </label>
      <input value={password} type="password" className="form-control" id="password" onChange={handlePasswordChange} />
      <button className="btn btn-primary mt-2" onClick={handleLogin}>
        Inicio de sesión
      </button>
    </div>
  );
}
