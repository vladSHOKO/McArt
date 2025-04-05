BX.ready(function () {
    const elements = document.querySelectorAll(".star");

    elements.forEach(element => {
        BX.bind(element, "click", clickStar);
    });
});

function clickStar(event) {
    event.preventDefault();

    let element = event.currentTarget;
    let agentID = element.dataset.id;

    if (agentID) {
        BX.ajax
            .runComponentAction(
                "mcart:agents.list", // название компонента
                "clickStar", // название метода, который будет вызван
                {
                    mode: "class", //вызывать действие из class.php
                    data: {
                        agentID: agentID
                    },
                }
            )
            .then(
                BX.proxy((response) => {
                    let data = response.data;
                    if (data['action'] == 'success') {
                        element.classList.toggle("active");
                    }

                }, this)
            )
            .catch(
                BX.proxy((response) => {
                    console.log(response.errors);
                }, this)
            )
    }
}
