import React, { useCallback } from 'react';
import Switch from 'react-switch';
import Hamburger from 'hamburger-react';
import { FiSun, FiMoon, FiBell, FiChevronDown } from 'react-icons/fi';

import { useTheme } from '../../hooks/theme';

import {
  Container,
  InputContainer,
  Actions,
  HamburguerButton,
  ThemeSwitcherContainer,
  NotificationsButton,
  ProfileButton,
} from './styles';

interface Props {
  isVisibleInMobile: boolean;
  handleToggleSideNav(): void;
}

const Navbar: React.FC<Props> = ({
  isVisibleInMobile,
  handleToggleSideNav,
}) => {
  const theme = useTheme();

  const changeTheme = useCallback(() => {
    theme.toggleTheme();
  }, [theme]);

  return (
    <Container>
      <InputContainer />

      <Actions>
        <HamburguerButton>
          <Hamburger
            color={theme.selectedTheme.colors.text1}
            toggled={isVisibleInMobile}
            toggle={handleToggleSideNav}
            size={24}
          />
        </HamburguerButton>
        <ThemeSwitcherContainer>
          <FiSun
            className={theme.selectedTheme.title === 'light' ? 'active' : ''}
          />

          <Switch
            onChange={changeTheme}
            checked={theme.selectedTheme.title === 'dark'}
            checkedIcon={false}
            uncheckedIcon={false}
            height={20}
            width={40}
            handleDiameter={20}
            offColor={theme.selectedTheme.colors.gray1}
            onColor={theme.selectedTheme.colors.accent}
          />

          <FiMoon
            className={theme.selectedTheme.title === 'dark' ? 'active' : ''}
          />
        </ThemeSwitcherContainer>

        <NotificationsButton>
          <FiBell />
        </NotificationsButton>

        <ProfileButton>
          <img
            src="https://avatars2.githubusercontent.com/u/48386738?s=460&u=3f9a149d5c9e6c854b0678f684a5b2c080ab6400&v=4"
            alt="Gabriel Gigante"
          />

          <div>
            <strong>Gabriel Henrique Gigante</strong>
            <FiChevronDown />
          </div>
        </ProfileButton>
      </Actions>
    </Container>
  );
};

export default Navbar;
