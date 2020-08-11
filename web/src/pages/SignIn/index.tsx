import React, { useState, useCallback } from 'react';
import { Link } from 'react-router-dom';
import { FiEye, FiEyeOff } from 'react-icons/fi';

import { Container, Content, AnimationContainer, Background } from './styles';
import { PlusOdontoIcon } from '../../components/PlusOdontoIcon';

const SignIn: React.FC = () => {
  const [hidePassword, setHidePassword] = useState(true);

  const handleTogglePasswordVisibility = useCallback(() => {
    setHidePassword(!hidePassword);
  }, [hidePassword]);

  return (
    <Container>
      <Content>
        <AnimationContainer>
          <form>
            <h1>Fazer login</h1>

            <fieldset className="input-container">
              <div className="input-block">
                <input
                  type="text"
                  id="email"
                  placeholder="E-mail"
                  autoComplete="off"
                />
              </div>
              <hr />
              <div className="input-block">
                <input
                  type={hidePassword ? 'password' : 'text'}
                  id="password"
                  placeholder="Senha"
                />

                <button type="button" onClick={handleTogglePasswordVisibility}>
                  {hidePassword ? <FiEye /> : <FiEyeOff />}
                </button>
              </div>
            </fieldset>

            <div className="actions">
              <div>
                <input type="checkbox" id="remember" />
                <label htmlFor="remember">Lembrar-me</label>
              </div>

              <Link to="/">Esqueci minha senha</Link>
            </div>

            <button type="submit">Entrar</button>
          </form>

          <div className="footer">
            <p>
              Não tem conta? <br />
              <Link to="/">Cadastre-se</Link>
            </p>
          </div>
        </AnimationContainer>
      </Content>

      <Background>
        <h1>Plus Odonto</h1>
        <PlusOdontoIcon color="#007bff" width="64px" height="64px" />
      </Background>
    </Container>
  );
};

export default SignIn;
