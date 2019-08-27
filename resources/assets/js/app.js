require('./bootstrap');
import React from 'react';
import { render } from 'react-dom';

import Blogs from './components/Blogs';

if (document.getElementById('blogs-list')) {
    render(
        <Blogs />,
        document.getElementById('blogs-list')
    );
}
