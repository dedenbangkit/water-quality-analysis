import React, { Component } from 'react';
import tableau from 'tableau-api';

class Tableau extends Component {

    componentDidMount() {
        this.initViz()
    }

    initViz() {
		this.props.getLoading(true);
        const vizContainer = this.vizContainer;
        let viz = new window.tableau.Viz(vizContainer, this.props.url)
		setTimeout(() => {
			this.props.getLoading(false);
		}, 2000);
    }

    render() {
        return (
            <div className="card-body" key={'tableau-' + this.props.index} ref = { (div) => { this.vizContainer = div } } > </div>
        )
    }
}

export default Tableau;
