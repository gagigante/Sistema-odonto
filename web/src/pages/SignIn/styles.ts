import styled, { keyframes } from 'styled-components';
import { shade } from 'polished';

import SignInBackground from '../../assets/sign-in-background.png';

const appearFromLeft = keyframes`
  from {
    opacity: 0;
    transform: translateX(-50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
`;

export const Container = styled.div`
  width: 100vw;
  height: 100vh;
  display: flex;
  align-items: stretch;

  @media (max-width: 1024px) {
    background-color: #f0f0f7;
    flex-direction: column-reverse;
    min-height: 100vh;
  }
`;

export const Content = styled.div`
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 100%;
  max-width: 700px;

  @media (max-width: 1024px) {
    width: calc(100% - 24px);
    min-height: 80%;
    margin: -100px auto 0;
    background-color: #fff;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    z-index: 5;
  }
`;

export const AnimationContainer = styled.div`
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  animation: ${appearFromLeft} 0.5s;

  @media (max-width: 1024px) {
    justify-content: flex-start;
    width: 100%;
  }

  form {
    margin: 80px 0;
    width: 340px;

    @media (max-width: 1024px) {
      max-width: 100%;
      margin: 48px 0;
      padding: 8px;
    }

    h1 {
      font-size: 36px;
      color: #19212e;
      text-align: left;
      margin-bottom: 40px;
    }

    fieldset.input-container {
      margin-bottom: 24px;
      border-radius: 8px;
      border: 1px solid #e6e6f0;

      .input-block {
        position: relative;
        padding: 24px;
        display: flex;
        justify-content: flex-start;
        align-items: center;

        @media (max-width: 1024px) {
          padding: 16px;
        }

        &:focus-within::after {
          content: '';
          position: absolute;
          width: 2px;
          height: calc(100% - 32px);
          background-color: #007bff;
          left: 0;
          top: 16px;
          bottom: 16px;
        }

        input {
          font-size: 16px;
          height: 24px;
          flex: 1;
        }

        button {
          background-color: transparent;
          margin-left: 8px;
          width: 24px;
          height: 24px;
          display: flex;
          justify-content: center;
          align-items: center;

          svg {
            color: #007bff;
            width: 18px;
            height: 18px;
          }
        }
      }

      hr {
        border: 0;
        clear: both;
        display: block;
        width: 100%;
        background-color: #e6e6f0;
        height: 1px;
      }
    }
  }

  div.actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
  }

  > a {
    color: #ff9000;
    display: block;
    margin-top: 24px;
    text-decoration: none;
    transition: color 0.2s;
    display: flex;
    align-items: center;
    &:hover {
    }
    svg {
      margin-right: 16px;
    }
  }

  button {
    width: 100%;
    height: 56px;
    border-radius: 8px;
    background-color: #04d361;
    color: #fff;
    font-weight: 600;
    font-size: 16px;
    transition: 0.2s;

    &:hover {
      background-color: ${shade(0.2, '#04d361')};
    }
  }
`;

export const Background = styled.div`
  background-color: #007bff;
  flex: 1;
  background-size: cover;

  @media (max-width: 1024px) {
    height: 100px;
  }
  /* background: url(${SignInBackground}) no-repeat center; */
`;
