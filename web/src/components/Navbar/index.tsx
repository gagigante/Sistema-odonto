import React from 'react';
import Switch from 'react-switch';

import { useTheme } from '../../hooks/theme';

import { Container } from './styles';

const Navbar: React.FC = () => {
  const theme = useTheme();

  function changeTheme() {
    theme.toggleTheme();
  }

  return (
    <Container>
      <div />

      <Switch
        onChange={changeTheme}
        checked={theme.selectedTheme.title === 'dark'}
        checkedIcon={false}
        uncheckedIcon={false}
        height={20}
        width={40}
        handleDiameter={20}
        offColor={theme.selectedTheme.colors.gray1}
        // offColor={shade(0.15, colors.primary)}
        onColor={theme.selectedTheme.colors.accent}
      />
    </Container>
  );
};

export default Navbar;
