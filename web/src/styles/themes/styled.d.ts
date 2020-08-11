import 'styled-components';

declare module 'styled-components' {
  export interface DefaultTheme {
    title: string;

    colors: {
      accent: string;
      hover: string;
      foreground: string;
      background: string;
      content: string;
      separator: string;
      text1: string;
      text2: string;
      text3: string;
      gray1: string;
      gray2: string;
      gray3: string;
      success: string;
      info: string;
      warning: string;
      danger: string;
      boxShadow: string;
    };
  }
}
