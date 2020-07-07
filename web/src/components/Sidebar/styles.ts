import styled from 'styled-components';

export const Container = styled.aside`
  grid-area: SB;
  display: flex;
  flex-direction: column;
  flex: 1;
  background-color: ${props => props.theme.colors.foreground};
  box-shadow: 6px 0px 32px 10px ${props => props.theme.colors.boxShadow};
  -webkit-box-shadow: 6px 0px 32px 10px ${props => props.theme.colors.boxShadow};
  -moz-box-shadow: 6px 0px 32px 10px ${props => props.theme.colors.boxShadow};
  z-index: 10;
`;

export const Header = styled.div`
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 60.5px;
  padding: 0 16px;

  border-bottom: 1px solid ${props => props.theme.colors.separator};

  h1 {
    font-size: 18px;
    font-weight: 500;
    color: ${props => props.theme.colors.text1};
  }
`;
