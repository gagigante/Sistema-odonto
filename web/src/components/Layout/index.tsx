import React, { useState, useCallback } from 'react';

import { Container, Grid, Content } from './styles';

import Sidebar from '../Sidebar';
import Navbar from '../Navbar';

const Layout: React.FC = () => {
  const [toggle, setToggle] = useState<boolean>(false);

  const handleToggleSideNav = useCallback(() => {
    setToggle(oldState => !oldState);
  }, [setToggle]);

  return (
    <Container>
      <Sidebar
        isVisibleInMobile={toggle}
        handleToggleSideNav={handleToggleSideNav}
      />
      <Grid>
        <Navbar
          isVisibleInMobile={toggle}
          handleToggleSideNav={handleToggleSideNav}
        />

        <Content />
      </Grid>
    </Container>
  );
};

export default Layout;
