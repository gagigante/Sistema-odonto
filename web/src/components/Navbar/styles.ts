import styled from 'styled-components';

export const Container = styled.div`
  grid-area: NB;
  display: flex;
  flex: 1;
  justify-content: space-between;
  align-items: center;
  padding: 6px 12px;
  background-color: ${props => props.theme.colors.navbar};
  box-shadow: 0px 6px 16px 0px ${props => props.theme.colors.boxShadow};
  -webkit-box-shadow: 0px 6px 16px 0px ${props => props.theme.colors.boxShadow};
  -moz-box-shadow: 0px 6px 16px 0px ${props => props.theme.colors.boxShadow};
  z-index: 5;
`;
