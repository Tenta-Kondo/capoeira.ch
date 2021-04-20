import React from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter, Route, Switch} from 'react-router-dom';

import Header from './Header';
import Footer from './Footer';


const App = () => {
    return(
        <React.StrictMode>
            <Header />
           
         
           </React.StrictMode>
    )
}

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}