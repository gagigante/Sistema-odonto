import React from 'react';

import { Container, Grid, Content } from './styles';

import Sidebar from '../Sidebar';
import Navbar from '../Navbar';

const Layout: React.FC = () => {
  return (
    <Container>
      <Sidebar />
      <Grid>
        <Navbar />

        <Content />
      </Grid>
    </Container>
  );
};

export default Layout;
