import React, { Component } from 'react';
import { Link } from 'react-router-dom';

import { PropTypes, instanceOf } from 'prop-types';
import { withCookies, Cookies } from 'react-cookie';

class SuperNav extends Component {


    render() {
		const { t } = this.props;

        return (
			<section className="super-nav">
			</section>
        );
    }
}

export default SuperNav;


