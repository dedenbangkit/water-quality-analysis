import React, { Component, Fragment } from 'react';
import { connect } from 'react-redux'
import { mapStateToProps, mapDispatchToProps } from '../reducers/actions.js'
import Header from './Header.js';
import ProgressBar from './ProgressBar.js';
import Cards from './Cards.js';
// import CardGroups from './CardGroups.js';
import HeaderGroup from './HeaderGroup.js';
import Pagination from './Pagination.js';
import Axios from 'axios';

class Page extends Component {

    constructor(props) {
        super(props);
    }

    componentDidMount() {
        axios.get('/api').then(
            (res) => {
                let resp = JSON.stringify(res.data);
                resp = JSON.parse(resp);
                let data = {...resp, group: 1};
                return this.props.loadGroup(data)
            }
        );
        // axios.get('http://geolocation-db.com/json/').then(res => {console.log(res.data)});
    }

    render() {
        return (
            <Fragment>
            <Header/>
            <div className="wrapper">
                <ProgressBar/>
                <section className="content">
                    <HeaderGroup data={this.props.value.group}/>
                    <Cards/>
                    <Pagination/>
                </section>
            </div>
            </Fragment>
        );
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(Page);
