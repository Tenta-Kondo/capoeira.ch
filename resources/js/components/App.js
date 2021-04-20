import React from 'react';
import ReactDOM from 'react-dom';

import Header from './Header';



const App = () => {
    return(
        <React.StrictMode>
            <Header />
           
         
           </React.StrictMode>
    )
}


    ReactDOM.render(<App />, document.getElementById('app'));
