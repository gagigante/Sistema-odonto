import styled from 'styled-components';

interface NotificationProps {
  notifications?: number;
}

export const Container = styled.div`
  height: 60px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 6px 0 6px 12px;
  background-color: ${props => props.theme.colors.content};
  box-shadow: 0px 6px 16px 0px ${props => props.theme.colors.boxShadow};
  -webkit-box-shadow: 0px 6px 16px 0px ${props => props.theme.colors.boxShadow};
  -moz-box-shadow: 0px 6px 16px 0px ${props => props.theme.colors.boxShadow};
  z-index: 5;
`;

export const Actions = styled.div`
  display: flex;
`;

export const ThemeSwitcherContainer = styled.div`
  margin-right: 8px;
  display: flex;
  justify-content: space-around;
  align-items: center;

  svg {
    color: ${props => props.theme.colors.text1};
    font-size: 18px;
    margin: 0 6px;
  }

  svg.active {
    color: ${props => props.theme.colors.accent};
  }
`;

export const NotificationsButton = styled.button<NotificationProps>`
  position: relative;
  width: 60px;
  height: 60px;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: transparent;
  border-left: 0.5px solid ${props => props.theme.colors.separator};
  cursor: pointer;

  > svg {
    font-size: 20px;
    color: ${props => props.theme.colors.text1};
  }
`;

export const ProfileButton = styled.button`
  padding: 0 12px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: transparent;
  border-left: 0.5px solid ${props => props.theme.colors.separator};
  cursor: pointer;

  > img {
    width: 42px;
    height: 42px;
    border-radius: 21px;
  }

  > div {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-left: 12px;

    strong {
      color: ${props => props.theme.colors.text1};
    }

    svg {
      margin-left: 6px;
      color: ${props => props.theme.colors.text1};
    }
  }
`;
