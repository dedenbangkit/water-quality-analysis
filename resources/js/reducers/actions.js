export const mapStateToProps = (state) => {
    return {
        value: state
    }
}

export const mapDispatchToProps = (dispatch) => {
    return {
        loadGroup: (data) => dispatch({
            type: "LOAD GROUP",
            data: data
        }),
        changeGroup: (data) => dispatch({
            type: "CHANGE GROUP",
            data: data
        }),
        reduceAnswer: (data) => dispatch({
            type: "REDUCE ANSWER",
            data: data
        }),
        updateGroup: () => dispatch({
            type: "UPDATE GROUP",
        }),
        checkSubmission: () => dispatch({
            type: "CHECK SUBMISSION"
        }),
        submitState: (data) => dispatch({
            type: "SUBMIT STATE",
            data: data
        })
    }
}
