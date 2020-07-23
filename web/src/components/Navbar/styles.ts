import styled from 'styled-components';

interface NotificationProps {
  notifications?: number;
}

export const Container = styled.div`
  max-width: 100%;
  height: 60px;
  overflow: hidden;
  display: flex;
  justify-content: space-between;

  align-items: center;
  background-color: ${props => props.theme.colors.content};
  box-shadow: 0px 6px 16px 0px ${props => props.theme.colors.boxShadow};
  -webkit-box-shadow: 0px 6px 16px 0px ${props => props.theme.colors.boxShadow};
  -moz-box-shadow: 0px 6px 16px 0px ${props => props.theme.colors.boxShadow};
  z-index: 5;
`;

export const InputContainer = styled.div`
  display: flex;

  @media (max-width: 500px) {
    display: none;
  }

  height: 100%;
  width: 120px;
  background-color: red;
`;

export const Actions = styled.div`
  display: flex;
`;

export const HamburguerButton = styled.div`
  display: none;

  @media (max-width: 500px) {
    display: flex;
  }

  justify-content: center;
  align-items: center;
  width: 60px;
  height: 60px;
`;

export const ThemeSwitcherContainer = styled.div`
  padding: 0 8px;
  display: flex;
  justify-content: space-around;
  align-items: center;

  @media (max-width: 500px) {
    border-left: 0.5px solid ${props => props.theme.colors.separator};
  }

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
    @media (max-width: 500px) {
      display: none;
    }

    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-left: 12px;

    strong {
      @media (min-width: 1025px) {
        max-width: 130px;
      }

      color: ${props => props.theme.colors.text1};
      white-space: pre;
      text-overflow: ellipsis;
      overflow: hidden;
    }

    svg {
      margin-left: 6px;
      color: ${props => props.theme.colors.text1};
    }
  }
`;
