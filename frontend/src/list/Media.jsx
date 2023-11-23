import enTranslations from '@shopify/polaris/locales/en.json';
import {
  AppProvider,
  Page,
  LegacyCard,
  ResourceList,
  Avatar,
  ResourceItem,
  Text,
  Button,
  Modal,
} from '@shopify/polaris';
import React, { useEffect, useState, useCallback } from 'react';
import axios from 'axios';
import { endpoint } from '../constant/endpoint';

export default function ResourceListExample() {
  const [data, setData] = useState([]);
  const [active, setActive] = useState(false);
  const [selectedItemId, setSelectedItemId] = useState(null);
  const toggleModal = useCallback((type_compte) => {
    setActive((prevActive) => !prevActive);
    setSelectedItemId(type_compte); // Save the selected item id
  }, []);

  const activator = (
    <Button onClick={toggleModal}>Toggle Modal</Button>
  );

  const getData = async () => {
    const { data } = await axios.get(endpoint.media);
    setData(data);
  };

  useEffect(() => {
    getData();
  }, []);

  return (
    <AppProvider i18n={enTranslations}>
      <Page title="Comptes Instagram">
        <LegacyCard>
          <ResourceList
            resourceName={{ singular: 'customer', plural: 'customers' }}
            items={data}
            renderItem={(item) => {
              const { id, type_compte } = item;
              const media = <Avatar customer size="md" name={type_compte} />;

              return (
                <ResourceItem
                  id={id}
                  media={media}
                  accessibilityLabel={`View details for ${type_compte}`}
                  shortcutActions={[
                    {
                      content: 'Reconnecter',
                      accessibilityLabel: `View ${type_compte}’s latest order`,
                      url: endpoint.redirect,
                    },
                    {
                      content: 'Remove',
                      accessibilityLabel: `View ${type_compte}’s latest order`,
                      onAction:()=> toggleModal(type_compte),
                    },
                  ]}
                  persistActions
                >
                  <Text variant="bodyMd" fontWeight="bold" as="h3">
                    {type_compte}
                  </Text>
                </ResourceItem>
              );
            }}
          />
          <Modal
            open={active}
            onClose={()=>toggleModal()}
            title={`Remove compte ${selectedItemId}`}
            primaryAction={{
              destructive: true,
              content: 'Discard changes',
              onAction:()=> toggleModal(),
            }}
            secondaryActions={[
              {
                content: 'Continue editing',
                onAction:()=> toggleModal(),
              },
            ]}
          >
            <Modal.Section>
            {`type compte ${selectedItemId}`}
            </Modal.Section>
          </Modal>
        </LegacyCard>
      </Page>
    </AppProvider>
  );
}
