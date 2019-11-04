import React, { Component, Fragment } from 'react';
import { connect } from 'react-redux'
import { mapStateToProps, mapDispatchToProps } from '../reducers/actions.js'
import Header from './Header.js';
import ProgressBar from './ProgressBar.js';
import Cards from './Cards.js';
// import CardGroups from './CardGroups.js';
import HeaderGroup from './HeaderGroup.js';
import Pagination from './Pagination.js';
import Swal from 'sweetalert2'
import Axios from 'axios';

class Page extends Component {

    constructor(props) {
        super(props);
        this.alertIntro = this.alertIntro.bind(this);
    }

    alertIntro() {
        Swal.fire({
          title: 'Hello there! 👋 ',
            html: "<div class='alert alert-info alert-dismissible'>You've been invited to participate </br>in a short <b>(max. 5 minutes)</b> test.</div>" +
            "<p class='text-justify'>After answering a few demographic questions, you will get to see two visualisations of water quality tests. The visualisations communicate different values of the water quality of a certain location.</p>" +
            "<p class='text-justify'>A score of 100 is the highest value indicating the water is of excellent quality while 0 is the lowest indicating poor water quality. </p>" +
            "<p class='text-justify'>The visualisations are interactive so you can filter them and scroll over the visualisation to get more information. For every visualisation you will be asked two activity-based questions and six questions on how well you appreciate the visualisation. Please note that it is your personal opinion that counts.<b> And remember there is no wrong or right answer.</b></p>",
          imageUrl: 'https://www.knowitallninja.com/wp-content/uploads/2018/06/Intranet-Extranet-Internet-and-Cloud.jpg',
          imageWidth: 500,
          imageAlt: 'Custom image',
          customClass: {
            popup: 'animated slideInDown'
          }
        })
    }

    componentDidMount() {
        axios.get('/api').then(
            (res) => {
                this.alertIntro();
                let data = {...res.data, group: 1};
                return this.props.loadGroup(data)
            }
        );
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
