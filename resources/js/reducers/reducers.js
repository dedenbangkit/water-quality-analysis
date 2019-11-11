const initialState = {
    sections: [{
            id: 1,
            text: "Loading...",
            visual: null,
            icon:"fas fa-stroopwafel fa-spin",
            show: true,
            complete: false,
            page: 1,
    }],
    questions: [{
        id: 1,
		section_id: 1,
        before: "Loading...",
		question: "Loading...",
		type: "text",
        show: true,
        answer: false,
        page: 1
    }],
	submit: false,
	captcha: false,
	group: {
		id: 1,
		text: "Loading...",
		visual: null,
		icon:"fas fa-stroopwafel fa-spin",
		show: true,
		complete: false,
        page:1
	},
    page: 1
}

const showSection = (state, data, change) => {
    const page = change ? data : data.group;
    const content = change ? state : data;
    const section = content.sections.map((x) => {
        let show = false;
        let complete = change ? x.complete : false;
        if (x.page === page) {
            show = true;
        }
        return {...x, show: show, complete: complete};
    });
    const question = content.questions.map((x) => {
        let show = false;
        let answer = change ? x.answer : false;
        if (x.page === page) {
            show = true;
        }
        return {...x, show: show, answer: answer};
    });
	let group = section.find(x => x.show)
    const questionGroup = question.filter(x => {return x.section_id === group.id})
    const questionAnswered = questionGroup.filter(x => {return x.answer})
    const isComplete = (questionGroup.length === questionAnswered.length)
    let updatedGroup = group;
    if (isComplete) {
        updatedGroup = {
            ...updatedGroup,
            complete:true
        }
    }
    return {
        ...state,
        sections: section,
        questions: question,
        page: page,
		group: updatedGroup
    };
}

const updateAnswer = (state, data) => {
    return state.map(x => {
        if (x.id === data.id) {
            x.answer = data.answer;
        }
        return x;
    });
}

const updateGroup = (group, questions) => {
    const questionAnswered = questions.filter(x => {return x.answer})
    const isComplete = (questions.length === questionAnswered.length)
    let updatedGroup = group;
    if (isComplete) {
        updatedGroup = {
            ...updatedGroup,
            complete:true
        }
    }
    return updatedGroup;
}

const completeGroup = (state, data, group) => {
    const questionGroup = state.map(x => {
        if (x.id === data.id) {
            x.answer = data.answer;
        }
        return x;
    }).filter(x => {return x.section_id == group.id});
    const questionAnswered = questionGroup.filter(x => {return x.answer})
    const isComplete = (questionGroup.length === questionAnswered.length)
    let updatedGroup = group;
    if (isComplete) {
        updatedGroup = {
            ...updatedGroup,
            complete:true
        }
    }
    return updatedGroup;
}

export const question = (state = initialState, action) => {
    switch(action.type){
        case 'LOAD GROUP':
            return showSection(state, action.data, false)
        case 'CHANGE GROUP':
            return showSection(state, action.data, true)
        case 'REDUCE ANSWER':
            return {
                ...state,
                questions: updateAnswer(state.questions, action.data),
                group: completeGroup(state.questions, action.data, state.group)
            }
        case 'UPDATE GROUP':
            return {
                ...state,
                group: updateGroup(state.group, state.questions)
            }
        case 'CHECK SUBMISSION':
            return {
                ...state,
            }
        case 'SUBMIT STATE':
            return {
                ...state,
            }
        default:
            return state;
    }
}
