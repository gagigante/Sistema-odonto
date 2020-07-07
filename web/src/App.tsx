import React from 'react';

import AppProvider from './hooks';

import Layout from './components/Layout';

import GlobalStyles from './styles/GlobalStyle';

const App: React.FC = () => {
  return (
    <AppProvider>
      <Layout />
      <GlobalStyles />
    </AppProvider>
  );
};

export default App;
