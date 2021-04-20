import React from 'react';
import ReactDOM from 'react-dom';

import Header from './Header';



// const App = () => {
//     return(
//         <React.StrictMode>
//             <Header />
           
         
//            </React.StrictMode>
//     )
// }

ReactDOM.render(
    <React.StrictMode>
      <Header />
    </React.StrictMode>,
    document.getElementById('app')
  );

  reportWebVitals();
