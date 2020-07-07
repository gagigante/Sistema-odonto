import React, {
  createContext,
  useContext,
  useState,
  useEffect,
  useCallback,
} from 'react';

import { ThemeProvider, DefaultTheme } from 'styled-components';

import light from '../styles/themes/light';
import dark from '../styles/themes/dark';

interface ThemeContextData {
  toggleTheme(): void;
  selectedTheme: DefaultTheme;
}

const ThemeContext = createContext<ThemeContextData>({} as ThemeContextData);

const ColorThemeProvider: React.FC = ({ children }) => {
  const [selectedTheme, setSelectedTheme] = useState<DefaultTheme>(() => {
    const storagedTheme = localStorage.getItem('@PlusOdonto:theme');

    if (storagedTheme) {
      return JSON.parse(storagedTheme);
    }

    return light;
  });

  useEffect(() => {
    localStorage.setItem('@PlusOdonto:theme', JSON.stringify(selectedTheme));
  }, [selectedTheme]);

  const toggleTheme = useCallback(() => {
    setSelectedTheme(selectedTheme.title === 'light' ? dark : light);
  }, [selectedTheme]);

  return (
    <ThemeContext.Provider value={{ toggleTheme, selectedTheme }}>
      <ThemeProvider theme={selectedTheme}>{children}</ThemeProvider>
    </ThemeContext.Provider>
  );
};

function useTheme(): ThemeContextData {
  const context = useContext(ThemeContext);

  return context;
}

export { ColorThemeProvider, useTheme };
