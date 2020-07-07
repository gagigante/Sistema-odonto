import React from 'react';

import { Grid, Content } from './styles';

import Sidebar from '../Sidebar';
import Navbar from '../Navbar';

const Layout: React.FC = () => {
  return (
    <Grid>
      <Sidebar />
      <Navbar />

      <Content />
    </Grid>
  );
};

export default Layout;
