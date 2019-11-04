import React, { Component, Fragment } from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';
import { createStore } from 'redux';
import { question } from '../reducers/reducers.js'
import Page from './Page.js';

const store = createStore(question);

class Main extends Component {
    render () {
        return (<Provider store={store}> <Page /> </Provider>)
    };
}

export default Main;

if (document.getElementById('app')) {
    ReactDOM.render(<Main />, document.getElementById('app'));
}
