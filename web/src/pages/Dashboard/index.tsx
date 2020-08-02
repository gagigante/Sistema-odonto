import React, { useState, useCallback } from 'react';
import { Switch, Route } from 'react-router-dom';

import { Container, Grid, Content } from './styles';

import Sidebar from '../../components/Sidebar';
import Navbar from '../../components/Navbar';

import Home from '../../components/Home';
import Schedule from '../../components/Schedule';
import Patients from '../../components/Patients';
import Treatments from '../../components/Treatments';
import Stock from '../../components/Stock';
import Financial from '../../components/Financial';

const Dashboard: React.FC = () => {
  const [toggle, setToggle] = useState<boolean>(false);

  const handleToggleSideNav = useCallback(() => {
    setToggle((oldState) => !oldState);
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

        <Content>
          <Switch>
            <Route path="/dashboard" exact component={Home} />
            <Route path="/dashboard/schedule" component={Schedule} />
            <Route path="/dashboard/patients" component={Patients} />
            <Route path="/dashboard/treatments" component={Treatments} />
            <Route path="/dashboard/stock" component={Stock} />
            <Route path="/dashboard/financial" component={Financial} />
          </Switch>
        </Content>
      </Grid>
    </Container>
  );
};

export default Dashboard;
