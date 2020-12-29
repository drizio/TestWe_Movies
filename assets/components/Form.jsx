import React, { useState } from "react";
import { fetchApi } from "../utils/";
import {  Button, Form, Input,   } from "antd";
import "antd/dist/antd.css";


export default function EditForm ({item, onSubmit}) {
    const [form] = Form.useForm();
    const [title, setTitle] = useState(()=>item.title);
    const [duration, setDuration] = useState(()=>item.duration);

    return  (<Form
        form={form}
        layout="vertical"
      >
       
        <Form.Item label="Title" >
          <Input placeholder="Title" value={title} onChange={(e)=> {
            console.log(e.target.value)
            setTitle(e.target.value)
          }}/>
        </Form.Item>
        <Form.Item
          label="Duration"
          
        >
          <Input placeholder="Duration" value={duration}  onChange={(e)=> {
            setDuration(e.target.value)
          }}/>
        </Form.Item>

        <Form.Item>
        <Button type="primary" htmlType="submit" onClick={()=>{
           let formD = new FormData()
           formD.append("title", title)
           formD.append("duration", duration)
           fetchApi("/api/movies/"+ item.id, {
             method: "PATCH",
             body: formD
           }).then(response => response.json())
           .catch(error => console.error('Error:', error))
           .then(response => console.log('Success:', JSON.stringify(response)))
           onSubmit()
        }}>
          Submit
        </Button>
      </Form.Item>
        
      </Form>)
}