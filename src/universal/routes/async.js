import React from 'react';

function asyncRoute(getComponent) {
  return class AsyncComponent extends React.Component {
    state = {
      Component: null
    };

    componentDidMount() {
      if ( this.state.Component === null ) {
        getComponent().then((Component) => {
          this.setState({Component: Component});
        })
      }
    }

    render() {
      const {
        Component
      } = this.state;

      if ( Component ) {
        return (<Component {...this.props} />);
      }
      return (
        <div style={{height: '100vh', backgroundColor: '#071325'}}>

        </div>
        );
    }
  }
}

export const Home = asyncRoute(() => {
  return System.import('../views/Home/HomeContainer.jsx');
});

export const StyleGuide = asyncRoute(() => {
  return System.import('../views/StyleGuide/StyleGuideContainer.jsx');
});

export const NotFound = asyncRoute(() => {
  return System.import('universal/components/Global/NotFound.jsx');
});
