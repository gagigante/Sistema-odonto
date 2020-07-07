import styled from 'styled-components';

// SB - Sidebar
// NB - Navbar
// CT - Content

export const Grid = styled.div`
  display: grid;
  grid-template-columns: 240px auto;
  grid-template-rows: 60px auto;
  grid-template-areas:
    'SB NB NB NB'
    'SB CT CT CT'
    'SB CT CT CT';
  height: 100vh;
`;

export const Content = styled.div`
  grid-area: CT;
  display: flex;
  flex: 1;
  background-color: ${props => props.theme.colors.content};
`;
