import { render } from "react-dom";
import React from "react";
import {  Layout  } from "antd";
import Movies from "./Movies"
import "antd/dist/antd.css";

const { Header,  Content } = Layout;


function Base () {
    return (
        <Layout>
            <Header>
                <h1 style={{ color: "white" }}>TestWe</h1>
            </Header>
            <Content className="site-layout" style={{ padding: '0 50px', marginTop: 64 }}>
              <Movies />
            </Content>
        </Layout>
    )
}

render(<Base />, document.getElementById("root"));
