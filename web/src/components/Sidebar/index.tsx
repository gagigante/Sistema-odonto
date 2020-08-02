import React from 'react';
import {
  FiX,
  FiHome,
  FiCalendar,
  FiUsers,
  FiActivity,
  FiArchive,
  FiDollarSign,
} from 'react-icons/fi';
import { useLocation } from 'react-router-dom';

import { useTheme } from '../../hooks/theme';

import {
  PlusOdontoIcon,
  Container,
  Header,
  CloseSideNavButton,
  Menu,
  MenuLink,
  MenuButton,
} from './styles';

interface Props {
  isVisibleInMobile: boolean;
  handleToggleSideNav(): void;
}

const Sidebar: React.FC<Props> = ({
  isVisibleInMobile,
  handleToggleSideNav,
}) => {
  const theme = useTheme();
  const location = useLocation();

  return (
    <Container isVisibleInMobile={isVisibleInMobile}>
      <Header>
        <PlusOdontoIcon
          color={theme.selectedTheme.colors.accent}
          width="32px"
          height="32px"
        />
        <h1>Plus Odonto</h1>

        <CloseSideNavButton onClick={handleToggleSideNav}>
          <FiX />
        </CloseSideNavButton>
      </Header>

      <Menu>
        <MenuLink to="/dashboard">
          <MenuButton
            isActive={location.pathname === '/dashboard' && true}
            onClick={handleToggleSideNav}
          >
            <span />

            <div>
              <FiHome />
              <h1>Dashboard</h1>
            </div>
          </MenuButton>
        </MenuLink>

        <MenuLink to="/dashboard/schedule">
          <MenuButton
            isActive={location.pathname === '/dashboard/schedule' && true}
            onClick={handleToggleSideNav}
          >
            <span />

            <div>
              <FiCalendar />
              <h1>Agenda</h1>
            </div>
          </MenuButton>
        </MenuLink>

        <MenuLink to="/dashboard/patients">
          <MenuButton
            isActive={location.pathname === '/dashboard/patients' && true}
            onClick={handleToggleSideNav}
          >
            <span />

            <div>
              <FiUsers />
              <h1>Pacientes</h1>
            </div>
          </MenuButton>
        </MenuLink>

        <MenuLink to="/dashboard/treatments">
          <MenuButton
            isActive={location.pathname === '/dashboard/treatments' && true}
            onClick={handleToggleSideNav}
          >
            <span />

            <div>
              <FiActivity />
              <h1>Tratamentos</h1>
            </div>
          </MenuButton>
        </MenuLink>

        <MenuLink to="/dashboard/stock">
          <MenuButton
            isActive={location.pathname === '/dashboard/stock' && true}
            onClick={handleToggleSideNav}
          >
            <span />

            <div>
              <FiArchive />
              <h1>Estoque</h1>
            </div>
          </MenuButton>
        </MenuLink>

        <MenuLink to="/dashboard/financial">
          <MenuButton
            isActive={location.pathname === '/dashboard/financial' && true}
            onClick={handleToggleSideNav}
          >
            <span />

            <div>
              <FiDollarSign />
              <h1>Financeiro</h1>
            </div>
          </MenuButton>
        </MenuLink>
      </Menu>
    </Container>
  );
};

export default Sidebar;
