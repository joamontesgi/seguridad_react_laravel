import React from 'react';
import { BrowserRouter as Router, Route, Routes, Navigate} from 'react-router-dom';
import Login from './Login';
import Home from './Home';

function App() {
  const isAuthenticated = localStorage.getItem('access_token');

  return (
    <Router>
      <Routes>
        <Route path="/login" element={<Login />} />
        {isAuthenticated && <Route path="/home" element={<Home></Home> }/>}
        <Route path="*" element={<Navigate to = {'/login'} replace />} />
      </Routes>
    </Router>
  );
}

export default App;
