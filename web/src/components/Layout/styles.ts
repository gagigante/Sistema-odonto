import styled from 'styled-components';

export const Container = styled.div`
  display: flex;
  width: 100%;
  height: 100%;
`;

export const Grid = styled.div`
  display: flex;
  flex: 1;
  flex-direction: column;
  height: 100vh;
  background-color: red;
`;

export const Content = styled.div`
  display: flex;
  flex: 1;
  background-color: ${props => props.theme.colors.content};
`;
