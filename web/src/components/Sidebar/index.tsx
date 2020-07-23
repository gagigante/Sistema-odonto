import React from 'react';
import {
  FiHome,
  FiCalendar,
  FiUsers,
  FiActivity,
  FiArchive,
  FiDollarSign,
} from 'react-icons/fi';

import { useTheme } from '../../hooks/theme';

import { PlusOdontoIcon, Container, Header, Menu, MenuButton } from './styles';

interface Props {
  isVisibleInMobile: boolean;
}

// eslint-disable-next-line react/prop-types
const Sidebar: React.FC<Props> = ({ isVisibleInMobile }) => {
  const theme = useTheme();

  return (
    <Container isVisibleInMobile={isVisibleInMobile}>
      <Header>
        <PlusOdontoIcon
          color={theme.selectedTheme.colors.accent}
          width="32px"
          height="32px"
        />
        <h1>Plus Odonto</h1>
      </Header>

      <Menu>
        <MenuButton isActive>
          <span />

          <div>
            <FiHome />
            <h1>Dashboard</h1>
          </div>
        </MenuButton>

        <MenuButton>
          <span />

          <div>
            <FiCalendar />
            <h1>Agenda</h1>
          </div>
        </MenuButton>

        <MenuButton>
          <span />

          <div>
            <FiUsers />
            <h1>Pacientes</h1>
          </div>
        </MenuButton>

        <MenuButton>
          <span />

          <div>
            <FiActivity />
            <h1>Tratamentos</h1>
          </div>
        </MenuButton>

        <MenuButton>
          <span />

          <div>
            <FiArchive />
            <h1>Estoque</h1>
          </div>
        </MenuButton>

        <MenuButton>
          <span />

          <div>
            <FiDollarSign />
            <h1>Financeiro</h1>
          </div>
        </MenuButton>
      </Menu>
    </Container>
  );
};

export default Sidebar;
