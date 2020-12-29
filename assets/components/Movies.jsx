import React, { useEffect, useState } from "react";
import { useAsync, fetchApi } from "../utils/";
import { Table, Modal, Button } from "antd";
import Loading from "./Loading";
import "antd/dist/antd.css";
import EditForm from "./Form"
import qs from 'qs';

export default function Movies({}) {
    const { data, status, error, run } = useAsync({ status: "idle" });
    const [currentPage, setCurrentPage] = useState(1)
    const [defaultPageSize, setDefaultPageSize] = useState(10)
    const [isModalVisible, setIsModalVisible] = useState(false);
    const [currentItem, setCurrentItem] = useState(null);
    const columns = [
      { dataIndex: "id", title: "ID", width: 70, key: "id" },
      { dataIndex: "title", title: "Title", width: 160, key: "title" },
      { dataIndex: "duration", title: "Duration", key: "duration", width: 70 },
      {
        dataIndex: "types",
        title: "Types",
        width: 160,
        key: "types",
        render: (types) => {
          const typesSerialized = types.map((type) => type.name);
          return typesSerialized.join(", ");
        },
      },
      {
        dataIndex: "movieHasPeople",
        title: "People",
        key: "people",
        sortable: false,
        width: 160,
        render: (movieHasPeople) => {
          const people = movieHasPeople.map(
            (p) => p.person.firstname + " " + p.person.lastname
          );
          return people.join(", ");
        },
      },
      {
        title: "Action",
        key: "operation",
        fixed: "right",
        width: 100,
        render: (_, record) => <Button type="primary" onClick={()=>showModal(record)}>
        Edit
      </Button>,
      },
    ];
  
    useEffect(() => {
      run(fetchApi("/api/movies?page="+currentPage));
    }, [run]);
  
    const showModal = (item) => {
      setCurrentItem(item)
      setIsModalVisible(true);
    };
  
    const handleOk = () => {
      setIsModalVisible(false);
    };
  
    const handleCancel = () => {
      setIsModalVisible(false);
    };
  
    console.log(data, status, error);
    if (status === "idle") {
      return <span>No Movie found</span>;
    } else if (status === "pending") {
      return <Loading />;
    } else if (status === "rejected") {
      throw error;
    } else if (status === "resolved") {
      const dataSource = data["hydra:member"].map((item) => ({
        ...item,
        key: item.id,
      }));
      return (
              <div className="site-layout-background" style={{ padding: 24, minHeight: 380 }}>
                  <Modal title={currentItem?.title || ''} visible={isModalVisible} onOk={handleOk} onCancel={handleCancel}>
                      <EditForm item={currentItem} onSubmit={handleOk} />
                  </Modal>
                  <Table
                  dataSource={dataSource}
                  columns={columns}
                  pageSize={5}
                  checkboxSelection
                  pagination={{
                      onChange:(page, pageSize) => {
                          setCurrentPage(page)
                          setDefaultPageSize(pageSize)
                          const query = qs.stringify({page, itemsPerPage: pageSize})
                          console.log(query)
                          run(fetchApi("/api/movies?"+ query));
                      },
                      current:currentPage,
                      defaultPageSize,
                      showSizeChanger: true,
                      pageSizeOptions: ["10", "20", "30"],
                      total: data["hydra:totalItems"],
                  }}
                  />
              </div>
        
      );
    }
  }
  