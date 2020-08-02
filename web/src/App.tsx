import React from 'react';
import { BrowserRouter as Browser } from 'react-router-dom';

import AppProvider from './hooks';

import Routes from './routes';

import GlobalStyles from './styles/GlobalStyle';

const App: React.FC = () => {
  return (
    <Browser>
      <AppProvider>
        <Routes />
      </AppProvider>

      <GlobalStyles />
    </Browser>
  );
};

export default App;
