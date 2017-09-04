import React, { Component } from 'react';
import { render } from 'react-dom';


class LoadingSpinner extends Component {
    render(){
        return (
        <div className="loading-container" style={{height: '50rem', backgroundColor: 'transparent', textAlign: 'center'}}>
          <div className="inline-spinner" style={{display: 'inline-block',
                                                  visibility: 'visible',
                                                  opacity: 1}}>
            <div className="spinner-bkg"></div>
            <div className="spinner"></div>
            <div className="spinner-wrapper">
              <div className="smite-bolt">
                <svg style={{"enableBackground":"new 0 0 216 216"}} version="1.1" viewBox="0 0 216 216" x="0px" y="0px" xmlSpace="preserve">
                  <g id="lightning-bolt">
                    <path d="M134.2,58.8L160.4,3h-56.4L69.2,82.9h23.2l-19,44.3H90l-34.5,86l90.1-105.1h-16.9l30.8-49.3H134.2z M139.5,111l-76.6,91.4&#xA;                  &#x9;&#x9;l50.8-85.5L139.5,111z M123.7,111.3L97.4,117l15.7,0.1l-21.7,8.4H77.8l19.6-8.6l25.9-47.4L96,81.1H74.8l24.2-11L126.9,15l28.6-9&#xA;                  &#x9;&#x9;l-25,55.8L99,70.1l24.3-0.5l31-7.9L123.7,111.3z"/>
                  </g>
                </svg>
              </div>
            </div>
          </div>
        </div>
        );
    }
}

export default LoadingSpinner;
