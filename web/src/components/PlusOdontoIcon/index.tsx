import React from 'react';

interface Props {
  color: string;
  width: string;
  height: string;
}

export const PlusOdontoIcon: React.FC<Props> = ({ color, width, height}) => {
  return (
      <svg width={width} height={height} viewBox="0 0 41 41" fill={color}>
      <path
        fillRule="evenodd"
        clipRule="evenodd"
        d="M21.9333011,30.314967 L18.0691155,18.8037699 L24.5642017,14.9387788 L28.0175608,19.8727243 L21.9333011,30.314967 Z M19.4087321,32.609151 L12.6663444,21.1801192 L16.4902529,19.8646689 L20.3133559,31.0463992 L19.4087321,32.609151 Z M20.2311906,7.39084904 L23.8488803,13.5991622 L12.1733527,19.8066699 L20.2311906,7.39084904 Z M20,0 C8.95440632,0 0,8.95440632 0,20 C0,31.0455937 8.95440632,40 20,40 C31.0447881,40 39.9991945,31.0455937 39.9991945,20 C39.9991945,8.95440632 31.0447881,0 20,0 L20,0 Z"
        // fill={color}
      />
    </svg>
  );
};
