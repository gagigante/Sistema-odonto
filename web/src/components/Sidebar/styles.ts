import styled, { css } from 'styled-components';
import { PlusOdontoIcon as Icon } from '../PlusOdontoIcon';

interface ContainerProps {
  isVisibleInMobile: boolean;
}

interface MenuButtonProps {
  isActive?: boolean;
}

export const PlusOdontoIcon = styled(Icon)`
  width: 100px;
  height: 100px;
`;

export const Container = styled.aside<ContainerProps>`
  @media (max-width: 500px) {
    position: absolute;
    width: 100%;
    height: 100%;
    transition: 0.2s ease-in-out;

    ${props =>
      props.isVisibleInMobile
        ? css`
            left: 0;
          `
        : css`
            left: -100vw;
          `}
  }

  @media (min-width: 500px) {
    display: flex;
    width: 72px;
  }

  @media (min-width: 1025px) {
    width: 240px;
  }

  flex-direction: column;
  background-color: ${props => props.theme.colors.foreground};
  box-shadow: 6px 0px 32px 10px ${props => props.theme.colors.boxShadow};
  -webkit-box-shadow: 6px 0px 32px 10px ${props => props.theme.colors.boxShadow};
  -moz-box-shadow: 6px 0px 32px 10px ${props => props.theme.colors.boxShadow};
  z-index: 10;
`;

export const Header = styled.div`
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 60.5px;
  padding: 0 16px;
  border-bottom: 1px solid ${props => props.theme.colors.separator};

  @media (min-width: 1025px) {
    justify-content: flex-start;
    padding: 0 0 0 24px;
  }

  > h1 {
    margin-left: 12px;
    font-size: 18px;
    font-weight: 500;
    color: ${props => props.theme.colors.text1};

    @media (max-width: 1024px) {
      display: none;
    }

    @media (max-width: 500px) {
      display: inherit;
    }
  }
`;

export const CloseSideNavButton = styled.button`
  background-color: transparent;
  position: absolute;
  right: 10px;

  > svg {
    font-size: 20px;
    color: ${props => props.theme.colors.text1};
  }
`;

export const Menu = styled.div`
  flex: 1;
  padding-top: 32px;
  overflow-y: auto;
  scrollbar-width: none;
  ::-webkit-scrollbar {
    display: none;
  }
`;

export const MenuButton = styled.div<MenuButtonProps>`
  position: relative;
  padding: 8px;
  transition: 0.15s ease-in-out;

  @media (min-width: 1025px) {
    padding: 0 0 0 16px;
  }

  & + div {
    margin-top: 8px;
  }

  > span {
    display: none;

    @media (min-width: 1025px) {
      display: inherit;
    }

    top: 50%;
    transform: translateY(-50%);
    left: -15px;
    position: absolute;
    width: 12px;
    height: 12px;
    border-radius: 6px;
    background: ${props => props.theme.colors.accent};
    transition: 0.08s ease-in-out;
  }

  > div {
    @media (max-width: 500px) {
      background-color: transparent;
    }

    ${props =>
      props.isActive &&
      css`
        background-color: ${props.theme.colors.hover};
      `}

    @media (min-width: 500px) {
      width: 52px;
      height: 52px;
      margin: 0 auto;
    }

    padding: 16px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.15s ease-in-out;

    @media (min-width: 1025px) {
      width: auto;
      height: auto;
      padding: 16px 0 16px 16px;
      justify-content: flex-start;
      border-radius: 0;
      border-top-left-radius: 36px;
      border-bottom-left-radius: 36px;
    }

    > svg {
      color: ${props => props.theme.colors.text1};
      font-size: 16px;

      ${props =>
        props.isActive &&
        css`
          color: ${props.theme.colors.accent};
        `}
    }

    > h1 {
      @media (min-width: 500px) {
        display: none;
      }

      @media (min-width: 1025px) {
        display: inherit;
      }

      color: ${props => props.theme.colors.text1};
      margin-left: 18px;
      font-weight: 400;
      font-size: 16px;

      ${props =>
        props.isActive &&
        css`
          color: ${props.theme.colors.accent};
        `}
    }
  }

  @media (min-width: 1025px) {
    ${props =>
      !props.isActive &&
      css`
        &:hover {
          padding-left: 32px;

          > span {
            left: 10px;
          }
        }
      `}
  }
`;
